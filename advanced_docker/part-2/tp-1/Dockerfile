FROM python
EXPOSE 5000
RUN apt-get update && apt-get install -y \
python3-pip
COPY app.py /app/app.py
WORKDIR /app
RUN pip install flask && pip install requests
CMD ["python3", "app.py"]