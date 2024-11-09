<?php
/*
Template Name: Products
*/
get_header(); ?>

<main class="container mx-auto py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Our Products</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="product-item bg-white p-6 shadow-md">
            <h2 class="text-xl font-semibold mb-4">Product 1</h2>
            <p>A description of the first product offered by the agency, including features and pricing.</p>
        </div>
        <div class="product-item bg-white p-6 shadow-md">
            <h2 class="text-xl font-semibold mb-4">Product 2</h2>
            <p>A description of the second product, explaining how it helps businesses grow and succeed online.</p>
        </div>
        <div class="product-item bg-white p-6 shadow-md">
            <h2 class="text-xl font-semibold mb-4">Product 3</h2>
            <p>Details about the third product, including the value it brings to clients and why it's worth investing in.</p>
        </div>
    </div>
</main>

<?php get_footer(); ?>
