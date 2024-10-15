<?php
/*
Template Name: Home Page
*/
get_header();
?>

<main class="container mx-auto py-8">
  <section class="hero bg-gray-200 p-8 text-center">
    <h1 class="text-4xl font-bold">Welcome to <?php bloginfo('name'); ?></h1>
    <p class="mt-4 text-lg">We create amazing custom websites.</p>
    <a href="/about" class="mt-6 inline-block bg-blue-500 text-white py-2 px-4 rounded">Learn More</a>
  </section>

  <section id="about" class="about mt-12 p-8">
    <h2 class="text-3xl font-bold mb-4">About Us</h2>
    <p class="text-lg">We specialize in web development, focusing on user experience and performance.</p>
  </section>

  <section class="services mt-12 p-8 bg-gray-100">
    <h2 class="text-3xl font-bold mb-4">Our Services</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="service bg-white p-6 shadow">
        <h3 class="text-xl font-semibold">Custom Web Design</h3>
        <p>We create fully customized designs tailored to your business needs.</p>
      </div>
      <div class="service bg-white p-6 shadow">
        <h3 class="text-xl font-semibold">SEO Optimization</h3>
        <p>We ensure your site is optimized for search engines to improve visibility.</p>
      </div>
      <div class="service bg-white p-6 shadow">
        <h3 class="text-xl font-semibold">Performance Tuning</h3>
        <p>Your site will be lightning fast with our performance optimization techniques.</p>
      </div>
    </div>
  </section>

  <section class="cta mt-12 p-8 text-center">
    <h2 class="text-3xl font-bold mb-4">Ready to Start?</h2>
    <a href="/contact" class="bg-green-500 text-white py-2 px-4 rounded">Contact Us</a>
  </section>
</main>

<?php get_footer(); ?>
