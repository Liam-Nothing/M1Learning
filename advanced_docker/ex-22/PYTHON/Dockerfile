FROM pypy:slim-bullseye
RUN apt-get update && apt-get install -y \
python3-pip
COPY passwordGenerator.py /app/passwordGenerator.py
WORKDIR /app
RUN pip install pyperclip