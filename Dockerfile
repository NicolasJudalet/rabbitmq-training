# Use Rabbitmqs a parent image
FROM rabbitmq:3

# Set the working directory to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

