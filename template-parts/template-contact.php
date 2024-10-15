<?php
/*
Template Name: Contact Us
*/
get_header(); ?>

<main class="container mx-auto py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Contact Us</h1>

    <section class="contact-info text-center mb-8">
        <p>Have any questions? Feel free to reach out to us:</p>
        <p>Email: info@youragency.com</p>
        <p>Phone: (123) 456-7890</p>
    </section>

    <section class="contact-form bg-gray-100 p-8">
        <h2 class="text-3xl font-bold mb-4">Send Us a Message</h2>
        <form action="submit-form-url" method="post" class="space-y-4">
            <div>
                <label for="name" class="block text-lg font-semibold">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div>
                <label for="email" class="block text-lg font-semibold">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div>
                <label for="message" class="block text-lg font-semibold">Message</label>
                <textarea id="message" name="message" rows="5" class="w-full p-2 border border-gray-300 rounded"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
        </form>
    </section>
</main>

<?php get_footer(); ?>
