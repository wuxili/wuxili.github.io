import argparse
import json
import itertools

def quote(str):
    return '"' + str + '"'

def hugoBold(str):
    return '**' + str + '**'

def texBold(str):
    return r'\textbf{' + str + '}'

def hugoItalic(str):
    return '*' + str + '*'

def isMe(author):
    return author == args.myname

def pubHasEntry(pub, key):
    return key in pub and pub[key] != ""

def getAuthorNameFull(author):
    # Output the full name of a author
    ln, fn = author.split(",")
    ln = ln.lstrip().rstrip()
    fn = fn.lstrip().rstrip()
    return fn + " " + ln

def getPubISODate(pub):
    # Output the date in ISO date format YYYY-MM-DD
    if not pubHasEntry(pub, "year") or not pubHasEntry(pub, "month"):
        raise Exception("year or month entry is missing in publication " + pub["name"])
    date = str(pub["year"]) + "-" + str(pub["month"]).zfill(2) + "-"
    if pubHasEntry(pub, "day"):
        date += str(pub["day"][0]).zfill(2)
    else:
        date += "01"
    return date

def getHugoPubType(typeStr):
    # Publication type.
    # Legend:
    # 0 = Uncategorized
    # 1 = Conference proceedings
    # 2 = Journal
    # 3 = Work in progress
    # 4 = Technical report
    # 5 = Book
    # 6 = Book chapter
    if typeStr == "conference":
        return str(1)
    elif typeStr == "journal":
        return str(2)
    else:
        return str(0)

def getHugoPubIn(pubIn, cjDict):
    # Get name of the conference/journal
    # 0: long name, 1: short name
    return cjDict[pubIn][0]

def getCVPubIn(pubIn, cjDict):
    # Get name of the conference/journal
    # 0: long name, 1: short name
    return cjDict[pubIn][0]

def sortPubListByDate(pubList):
    # Sort a list of publications from newest to oldest
    def getPubDateYYYYMMDD(pub):
        res = 0
        if pubHasEntry(pub, "year"):
            res += pub["year"] * 10000
        else:
            res += 99990000
        if pubHasEntry(pub, "month"):
            res += pub["month"] * 100
        else:
            res += 9900
        if pubHasEntry(pub, "day"):
            res += pub["day"][0]
        else:
            res += 99
        return res
    def pubDateCmp(l, r):
        ldate = getPubDateYYYYMMDD(l)
        rdate = getPubDateYYYYMMDD(r)
        if ldate > rdate:
            return -1
        elif ldate < rdate:
            return 1
        else:
            return 0
    pubList.sort(pubDateCmp)

def setPubIDs(pubList, prefix):
    i = len(pubList)
    for pub in pubList:
        pub["id"] = prefix + str(i)
        i -= 1

def genHugoPubMDFile(pub, cjDict, fileName):
    # Generate a publication markdown (.md) file for a publication entry
    ofs = open(fileName, 'w')

    ofs.write("+++\n")
    ofs.write("prefix = " + quote("[" + pub["id"] + "]") + "\n")
    ofs.write("title = " + quote(pub["title"]) + "\n")
    ofs.write("date = " + getPubISODate(pub) + "\n")

    # Author list
    authorListStr = "["
    sep = ""
    for author in pub["authors"]:
        if isMe(author):
            authorListStr += sep + quote(hugoBold(getAuthorNameFull(author)))
        else:
            authorListStr += sep + quote(getAuthorNameFull(author))
        sep = ", "
    authorListStr += "]"
    ofs.write("authors = " + authorListStr + "\n")

    ofs.write("publication_types = [" + getHugoPubType(pub["type"]) + "]\n")
    ofs.write("publication = " + quote(hugoItalic(getHugoPubIn(pub["pub_in"], cjDict))) + "\n")
    if pubHasEntry(pub, "hugo_suffix"):
        ofs.write("suffix = " + quote(pub["hugo_suffix"]) + "\n")

    if pubHasEntry(pub, "pub_link"):
        ofs.write("title_href = " + quote(pub["pub_link"]) + "\n")
    else:
        ofs.write("title_href = " + quote("javascript:void(0)") + "\n")

    if pubHasEntry(pub, "pdf_link"):
        ofs.write("url_pdf = " + quote(pub["pdf_link"]) + "\n")
    if pubHasEntry(pub, "slides_link"):
        ofs.write("url_slides = " + quote(pub["slides_link"]) + "\n")
    if pubHasEntry(pub, "hugo_projects"):
        ofs.write("projects = [")
        sep = ""
        for prj in pub["hugo_projects"]:
            ofs.write(sep + quote(prj))
            sep = ", "
        ofs.write("]\n")
        ofs.write(r'url_project = "#"' + "\n")

    ofs.write("selected = true\n")
    ofs.write("+++\n")
    ofs.close()

def getCVPubTexEntry(pub, cjDict):
    # Get the CV publication entry for a given paper
    res = ""
    res += r"\item[{[" + pub["id"] + "]}]{" + "\n";

    res += "    "
    prefix = ""
    for author in pub["authors"]:
        name = getAuthorNameFull(author)
        if isMe(author):
            name = texBold(name)
        res += prefix + name + ","
        prefix = " "
    res += "\n"

    res += "    ``"
    if pubHasEntry(pub, "pub_link"):
        res += r"\href{" + pub["pub_link"] + "}{" + pub["title"] + "}"
    else:
        res += pub["title"]
    res += "'',\n"

    res += "    " + getCVPubIn(pub["pub_in"], cjDict) + ", " + str(pub["year"]) + ".\n"
    if pubHasEntry(pub, "cv_suffix"):
        res += "    " + pub["cv_suffix"] + "\n"
    res += "}"
    return res

def genCVPubTexFile(confPubList, jrnlPubList, cjDict, fileName):
    # Generate Tex file for CV publication section
    ofs = open(fileName, 'w')

    ofs.write(r"\begin{rSection}{Publications}" + "\n\n")

    ofs.write(r"\textbf{Journal Articles}" + "\n")
    ofs.write(r"\begin{description}[font=\normalfont]" + "\n")
    for pub in jrnlPubList:
        ofs.write(getCVPubTexEntry(pub, cjDict) + "\n\n")
    ofs.write(r"\end{description}" + "\n\n")

    ofs.write(r"\textbf{Conference Papers}" + "\n")
    ofs.write(r"\begin{description}[font=\normalfont]" + "\n")
    for pub in confPubList:
        ofs.write(getCVPubTexEntry(pub, cjDict) + "\n\n")
    ofs.write(r"\end{description}" + "\n\n")

    ofs.write(r"\end{rSection}" + "\n")

    ofs.close()

if __name__ == "__main__":
    parser = argparse.ArgumentParser()
    parser.add_argument("--json", dest="json", required=True, help = 'The publication database in json format')
    parser.add_argument("--myname", dest="myname", required=True, help = 'My name will be highlighted')
    parser.add_argument("--mdpath", dest="mdpath", required=True, help = 'The path to publication markdown files')
    parser.add_argument("--cvpubtex", dest="cvpubtex", required=True, help = 'The CV publication Tex file')
    args = parser.parse_args()

    db = json.load(open(args.json))

    # Conference/journal name mapping
    cjDict = db[0]

    # Divide all publications into conference and journal
    confPubList = []
    jrnlPubList = []
    otherPubList = []
    for pub in itertools.islice(db, 1, None):
        if pub["type"] == "conference":
            confPubList.append(pub)
        elif pub["type"] == "journal":
            jrnlPubList.append(pub)
        else:
            otherPubList.append(pub)

    # Sort publications by date and assign IDs
    sortPubListByDate(confPubList)
    sortPubListByDate(jrnlPubList)
    setPubIDs(confPubList, "C")
    setPubIDs(jrnlPubList, "J")

    # Generate markdown file one by one
    for pub in itertools.chain(confPubList, jrnlPubList):
        genHugoPubMDFile(pub, cjDict, args.mdpath + "/" + pub["name"] + ".md")
    
    # Generate CV publication Tex file
    genCVPubTexFile(confPubList, jrnlPubList, cjDict, args.cvpubtex)
