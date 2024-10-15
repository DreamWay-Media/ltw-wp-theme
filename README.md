# Skeleton Theme

This theme provides a lightweight foundation for building custom WordPress websites.

---

## Setup Instructions

Follow these steps to get the skeleton theme up and running:

### 1. Clone the Repository

First, clone the theme repository into your WordPress `wp-content/themes/` directory:

```
cd path/to/themes
git clone https://github.com/DreamWay-Media/dwm-skeleton-theme.git
```
### 2. Install and Set Up WordPress Locally
Make sure you have a working WordPress setup. If you don't, you can quickly set up WordPress using Docker.

Once your environment is running, navigate to http://localhost:8000 and follow the WordPress setup instructions.

### 3. Activate the Skeleton Theme
Go to the WordPress Admin Dashboard (http://localhost:8000/wp-admin).
Navigate to Appearance > Themes.
Find the Skeleton Theme and activate it.

### 4. Install Dependencies for Tailwind CSS
The theme uses Tailwind CSS for styling. You'll need to install Node.js and the necessary dependencies.

**Install Node.js:** Download and install Node.js.

Navigate to the theme directory in your terminal:
```
cd path/to/themes/dwm-skeleton-theme
```
Install Dependencies:
```
npm install
```

### 5. Build Tailwind CSS
Tailwind is set up to compile using PostCSS. After installing dependencies, build the CSS by running:
```
npm run build:css
```
This will generate the compiled CSS file in the dist directory.

### 6. Create and Assign Menus
Go to **Appearance** > **Menus**.

Create a Primary Menu and assign it to the Primary Menu location.
Create a Footer Menu and assign it to the Footer Menu location.

### 7. Customize the Theme
You can now begin customizing the theme to fit your project needs:

The Skeleton Theme comes with several template files to get you started. You can create new pages and assign custom templates:

Go to **Pages** > **Add New**.
Create a new page and assign one of the existing templates:
**Home Page**: Use template-home.php for a custom homepage layout.
**Services Page**: Use template-services.php to showcase services.
**Products Page**: Use template-products.php to display products.
**Team Page**: Use template-team.php to display the team.
**Contact Page**: Use template-contact.php to set up a contact page.