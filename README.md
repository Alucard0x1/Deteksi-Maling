
# Deteksi Maling Berdasarkan Neptu Jawa

A simple web-based tool for detecting culprits based on the traditional Javanese Neptu system. This tool allows users to input the birth date of the victim and the date of the loss, and based on Primbon calculations, the tool provides insights on who the potential culprit could be.

![Neptu Jawa](./public/neptu.webp)

## Features
- **Neptu-based Culprit Detection:** Leverages traditional Javanese astrology (Primbon) to detect potential culprits.
- **User-friendly Interface:** Simple date input form with intuitive buttons.
- **Responsive Design:** The application adjusts for desktop and mobile views.
- **SEO Optimized:** Includes OpenGraph tags, JSON-LD schema, and meta tags for enhanced search engine visibility and better sharing on social platforms.
- **Full-width Button:** The "Hitung Neptu" button takes up the full width of the form for a better user experience.
- **Social Sharing Image:** A custom image `neptu.webp` is included to represent the tool when shared on social media.

## Demo
Live version of the tool can be found [here](https://deteksi-maling2.vercel.app/).

## Table of Contents
- [Features](#features)
- [Demo](#demo)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [SEO and Social Sharing](#seo-and-social-sharing)
- [Customization](#customization)
- [License](#license)

## Installation

### Prerequisites
- A basic understanding of PHP and HTML.
- [Vercel CLI](https://vercel.com/docs/cli) or GitHub for deployment.

### Steps

1. **Clone the repository**:
    ```bash
    git clone https://github.com/yourusername/deteksi-maling-neptu-jawa.git
    ```

2. **Navigate to the project folder**:
    ```bash
    cd deteksi-maling-neptu-jawa
    ```

3. **Install Vercel (optional, if deploying via Vercel CLI)**:
    ```bash
    npm i -g vercel
    ```

4. **Deploy the project**:
    You can deploy using Vercel CLI:
    ```bash
    vercel --prod
    ```

    Or push the project to a GitHub repository linked to Vercel.

## Usage

1. **Access the tool**: Once deployed or run locally, users can visit the main URL to access the tool.
2. **Input dates**: Enter the birth date of the victim and the date of the loss.
3. **Hitung Neptu**: Click the "Hitung Neptu untuk Deteksi Pelaku" button to calculate and display the results.
4. **Hitung Lagi**: If needed, users can recalculate by clicking the "Hitung Lagi" button.

## Project Structure

```
your_project/
├── api/
│   ├── index.php          // Main logic for the form and result display
│   ├── process.php        // Processes the input and calculates results
├── public/
│   ├── neptu.webp         // Custom image for social sharing
│   ├── style.css          // Custom styling for the form and buttons
├── vercel.json            // Vercel configuration file
└── README.md              // Project readme file (this file)
```

- **`api/index.php`:** Handles the form submission and displays results.
- **`api/process.php`:** Processes the dates provided by the user and performs Neptu calculations.
- **`public/style.css`:** Contains styles for buttons, form layout, and result display.
- **`public/neptu.webp`:** Image used for social sharing and display on the form.

## SEO and Social Sharing

This tool is optimized for search engines and social media sharing. Here's what's included:

1. **OpenGraph Tags**: 
   Ensures the correct title, description, and image are shown when shared on social media like Facebook, Twitter, and LinkedIn.
    ```html
    <meta property="og:title" content="Deteksi Maling Berdasarkan Neptu Jawa">
    <meta property="og:description" content="Gunakan perhitungan neptu Jawa untuk mendeteksi pelaku kehilangan berdasarkan Primbon Jawa.">
    <meta property="og:image" content="https://deteksi-maling2.vercel.app/neptu.webp">
    <meta property="og:url" content="https://deteksi-maling2.vercel.app/">
    ```

2. **Twitter Cards**:
   Displays summary cards with large images when shared on Twitter.
    ```html
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Deteksi Maling Berdasarkan Neptu Jawa">
    <meta name="twitter:description" content="Gunakan perhitungan neptu Jawa untuk mendeteksi pelaku kehilangan berdasarkan Primbon Jawa.">
    <meta name="twitter:image" content="https://deteksi-maling2.vercel.app/neptu.webp">
    ```

3. **JSON-LD Structured Data**:
   Provides structured data to help search engines better understand the content of the page and improve SEO rankings.
    ```html
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Deteksi Maling Berdasarkan Neptu Jawa",
        "url": "https://deteksi-maling2.vercel.app/",
        "image": "https://deteksi-maling2.vercel.app/neptu.webp",
        "description": "Gunakan perhitungan neptu Jawa untuk mendeteksi pelaku kehilangan berdasarkan Primbon Jawa.",
        "author": {
            "@type": "Person",
            "name": "Author Name"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Primbon Jawa",
            "logo": {
                "@type": "ImageObject",
                "url": "https://deteksi-maling2.vercel.app/neptu.webp"
            }
        }
    }
    </script>
    ```

## Customization

1. **Change Image**: 
   To change the social sharing or form image, replace the `neptu.webp` file located in the `public/` folder with your own image and update the OpenGraph and Twitter meta tags with the new image path.

2. **Adjust Form Fields**:
   If you want to adjust or add more fields (e.g., name, location), modify the `index.php` and `process.php` files to handle the new fields.

3. **Styling**:
   Modify the `public/style.css` file to change the layout, colors, fonts, or button styles.

## License

This project is licensed under the MIT License. See the [LICENSE](./LICENSE) file for details.
