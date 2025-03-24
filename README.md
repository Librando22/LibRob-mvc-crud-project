# LibRob-mvc-crud-project
Midterm Project for SysArch31
## UniversityApp - MVC CRUD System

### Project Overview  
This is a simple **University Management System** built using PHP (MVC Architecture) with MySQL.  
It allows users to manage **colleges, departments, and students** efficiently.  

#### Features:
✔ **Manage Colleges & Departments** (Add, Edit, Delete)  
✔ **User Authentication & Role-Based Access**  
✔ **API Integration for External Data (e.g., OpenWeather API)**  
✔ **GitHub Version Control with Branching & PR Workflow** 

---

## How to Clone & Run the Application

### 1. Clone the Repository
Open **Command Prompt (CMD)** or **Terminal** and run:
```sh
git clone https://github.com/YourUsername/UniversityApp.git
cd UniversityApp

### 2. Set Up the Database
Open **XAMPP Control Panel** and start Apache & MySQL
Open phpMyAdmin (http://localhost/phpmyadmin/)
Create a new database called universitydb
Import the database file:
Click "Import"
Choose universitydb.sql
Click "Go"

### 3. Configure Database Connection
Edit the db.php file and update database credentials if needed:
php
$host = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Leave empty if no password is set
$database = "universitydb";
$conn = new mysqli($host, $username, $password, $database);

### 4. Run the Application
Open your browser and go to:
arduino
Copy
Edit
http://localhost/UniversityApp/

---

Git Workflow - Branching, Merging & PR Process
Your team will use GitHub for version control with a feature-branch workflow.

### 1 Creating a New Feature Branch
Each developer should create a separate branch for their task:

sh
git checkout -b feature-student-management
### 2 Making & Committing Changes
After making changes, add and commit the updates:

sh
git add .
git commit -m "feat: added student management module"
### 3 Pushing the Branch to GitHub
Once changes are committed, push them to GitHub:

sh
git push origin feature-student-management
### 4 Creating a Pull Request (PR)
Go to GitHub Repository → Pull Requests → New Pull Request

Select feature-student-management as the source branch

Choose develop as the target branch

Write a description of the changes and submit the Pull Request (PR)

### 5 Reviewing & Merging the PR
A team member reviews the PR and approves it

After approval, merge the branch into develop:

sh
git checkout develop
git merge feature-student-management
git push origin develop
Delete the feature branch after merging:

sh
git branch -d feature-student-management
git push origin --delete feature-student-management
### 6 Deploying to main
Once develop is stable, merge it into main:

sh
git checkout main
git merge develop
git push origin main

---

GitHub Issues for Task Management
Creating & Assigning Issues:
Go to GitHub Repository → Issues

Click "New Issue"

Add a Title & Description

Assign the issue to a team member

Add relevant labels (bug, enhancement, task, etc.)

Example Issues:
Issue #	Title	Assigned To	Status
#1	feat: Implement User Authentication	@username1 = In Progress
#2	fix: Correct API response formatting	@username2 = Completed
#3	docs: Write API documentation	@username3 = Open
Project Contributors
Ed Francis C. Librando – @Librando22
Ronnie Len Roberts – @RobertsDev5
