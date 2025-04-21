## Download and Install Docker

**Windows:**

1. Download the Docker Desktop Installer from the official Docker website.
2. Run the installer and follow the on-screen instructions.
3. After installation,1 start Docker Desktop.

**macOS:**

1. Download the Docker Desktop Installer from the official Docker website.
2. Run the installer and drag the Docker icon to the Applications folder.
3. Start Docker Desktop from the Applications folder.

## Create a New Project

**Windows and Mac:**

1. Save the provided `docker-compose.yml` file to an empty folder.
2. Open a terminal or command prompt and navigate to the folder where you saved the `docker-compose.yml` file.
3. Run the command `docker-compose up -d`. This will download the necessary images and start the containers in detached mode.
4. Once the containers are running, you can access the PHP server at `http://localhost:8080` in your web browser.
5. You can also access phpMyAdmin at `http://localhost:8081` to manage your MySQL databases.

**Note:** The first time you run `docker-compose up -d`, it may take a few minutes to download the necessary images.