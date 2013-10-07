<?php $page = "about"; ?>
<?php include 'header.php'; ?>

<script type="text/javascript">
    $(function () {
        $('nav').height($(window).height()-$('footer').height());
        $('aside').height($(window).height()-$('footer').height());
    });
</script>

<nav>
    <ul>
        <li><a href="">
                <img src="images/about-hover@2x" alt="About">
                <h4>About</h4>
            </a></li>
        <li><a href="">
                <img src="images/about-hover@2x.png" alt="About">
                <h4>About</h4>
            </a></li>
        <li><a href="">
                <img src="images/projects@2x.png" alt="Projects">
                <h4>Projects</h4>
            </a></li>
        <li><a href="">
                <img src="images/labs@2x.png" alt="Labs">
                <h4>Labs</h4>
            </a></li>
        <li><a href="">
                <img src="images/blog@2x.png" alt="Blog">
                <h4>Blog</h4>
            </a></li>
        <li><a href="">
                <img src="images/contact@2x.png" alt="Contat">
                <h4>Contact</h4>
            </a></li>
    </ul>
</nav>
<aside>test</aside>
<section>test</section>

<?php include 'footer.php'; ?>