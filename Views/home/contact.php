<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Govithena | Contact Us</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>home/contact.css">
</head>

<body>

    <?php require_once(COMPONENTS . 'navbar.php'); ?>

    <div class="[ container ][ contact ]" container-type="section">
        <h1>Contact Us</h1>
        <p>If you have any inquiries, comments, or suggestions, please do not hesitate to contact us using the form below.<br>Our team will do their best to respond to you as soon as possible.</p>
        <div class="[ grid ]" lg="2" gap="1">
            <form order-lg="2">
                <div class="[ row ]">
                    <div class="[ form__group ]">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="[ form__group ]">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                </div>
                <div class="[ form__group ]">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject">
                </div>
                <div class="[ form__group ]">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <div class="[ form__group ]">
                    <button type="submit">Send</button>
                </div>
            </form>
            <div class="[ help ]" order-lg="1">
                <img src="<?php echo IMAGES ?>/svg/contact_us.svg" alt="contact us" />
                <p>In the meantime, if you are looking for answers to common questions or need assistance with our products or services, <br>we invite you to check out our <a href="">Help and Support Center.</a></p>
            </div>
        </div>
    </div>

    <?php require_once(COMPONENTS . 'footer.php'); ?>

    <script src="<?php echo JS ?>/navbar/navbar.js"></script>
</body>

</html>







<!-- 
ABOUT US
Agriculture Investment - Building a Sustainable Future

Agriculture is a vital industry that plays a crucial role in feeding the world and sustaining the global economy. By investing in this sector, you can not only help to secure a food-secure future, but also support the growth of a responsible and sustainable agricultural industry.

At [Company Name], we are dedicated to providing our clients with innovative and profitable investment opportunities in the agriculture sector. Our team of experts leverages their deep knowledge of the industry and access to cutting-edge technologies to identify high-potential investment opportunities and help you make informed decisions.

Whether you're looking to invest in farmland, agribusiness, or cutting-edge agriculture technologies, we have the expertise and resources to help you achieve your goals. Our portfolio of investments is diversified and balanced, ensuring that you are exposed to a range of opportunities across different stages of the agriculture value chain.

Investing with [Company Name] not only offers you the potential for strong financial returns, but also the satisfaction of knowing that you are contributing to the growth of a sustainable and responsible agriculture sector. We are committed to responsible investment practices and work closely with our partners to ensure that our investments promote sustainable agriculture practices, conserve natural resources, and benefit local communities.

Join us today and help build a brighter future for agriculture and the world. Get in touch with our team to learn more about our agriculture investment opportunities and start building your portfolio. -->