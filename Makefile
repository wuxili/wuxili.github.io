all:
	rm ./content/publication/*
	python ./scripts/jsonconvert.py --json ./scripts/publications.json --myname "Li, Wuxi" --mdpath ./content/publication --cvpubtex ./cv/doc/publication.tex
	make -C ./cv
	cp ./cv/cv.pdf ./static/pdf/cv.pdf
	hugo --buildFuture
