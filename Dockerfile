FROM ubuntu:latest
LABEL authors="Вова"

RUN apt-get update && apt-get install -y \
        python3 \
        python3-pip \
        && pip install beautifulsoup4


ENTRYPOINT ["top", "-b"]

