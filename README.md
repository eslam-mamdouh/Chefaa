# Chefaa Store
Chefaa Store is Built By Laravel With Docker.


## Prerequisites
To get started, you will need on Your Windows : 

- **git Install** - `[Download](https://git-scm.com/downloads) .`

- **Ubuntu Installed from Windows Store**  - `Search in Windows Store For "Ubuntu" and Install it.`

- **Docker Installed** - `[Install Guid](https://docs.docker.com/desktop/windows/install/)`
After installing the docker desktop, open the docker application and go to settings.
In **Settings** > **Resources** > **WSL INTEGRATION**, make sure to turn on the “Enable integration with additional distros”.


## Usage

- Create New Folder For Your Workspace.
- Go to Your Workspace Folder.
- Run This Command  `git clone https://github.com/eslam-mamdouh/Chefaa.git`
- Then , Run `docker-compose up -d` to build and run Project Containers
- Then , Run `cd app`
- Then , Run `docker run --rm -v $(pwd):/app composer install`
- Then , Run `sudo chown 777 -R /public/images` - for uploads products images to this folder.
- Run `docker-compose exec -it chefaa-app bash` - to open cmd for laravel project 
- Run `php artisan migrate` - for Database Tables Migrations
- Run `php artisan db:seed` - For seed 50K Product & 20k Pharmacy and **Assign Random Products for each Pharmacy** NOTE: **It May Takes up to 3 minutes**
- Run `php artisan test` - For Test Project Units and API
- Finally to Browse Your Project Open `http://localhost:8080`