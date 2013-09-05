<?php $page = "index"; ?>
<?php include 'header.php'; ?>
<script type="text/javascript">
    $(function () {
        var MAX_MODULE = 0;
        $(window).on('ready load resize', function () {
            $('nav').find('li').each(function () {
                if($(this).height() > MAX_MODULE) {
                    MAX_MODULE = $(this).outerHeight();
                }
            });
            $('nav').find('li').css('height',MAX_MODULE+"px");
        });



        var delay = 500;
        var easing = "easeInOutCirc";

        function slideDown() {
            $(this).animate({
                'backgroundColor':'#000'
            },450);

            var $img, $h2, $p;
            $img = $(this).find('img');
            $h2 = $(this).find('h2');
            $p = $(this).find('p');

            var hoverColor = $(this).data('color');
            var iMTop = $img.css('margin-top');
            var hMTop = $h2.css('margin-top');
            var pMTop = $p.css('margin-top');

            $img.css({'margin-top':'-1000px','padding-bottom':'1000px'});
            $h2.css({'margin-top':'-1000px','padding-bottom':'1020px','color':'#'+hoverColor});
            $p.css({'margin-top':'-1000px','padding-bottom':'1020px','color':'#'+hoverColor});

            $img.attr('src',$img.data('hover'));

            // First down
            $p.animate({
                'marginTop':pMTop,
                'paddingBottom':0
            },delay,easing);

            // Slight Delay
            $h2.delay(120).animate({
                'marginTop':hMTop,
                'paddingBottom':0
            },delay,easing);

            // Longer Delay
            $img.delay(240).animate({
                'marginTop':iMTop,
                'paddingBottom':0
            },delay,easing);

        }
        function slideOut() {
            var $img, $h2, $p;
            $this = $(this);
            $img = $this.find('img');
            $h2 = $this.find('h2');
            $p = $this.find('p');

            // First up
            $img.animate({
                'marginTop':'-1000px',
                'paddingBottom':'1000px'
            },delay,easing);

            $h2.delay(120).animate({
                'marginTop':'-1000px',
                'paddingBottom':'1000px'
            },delay,easing);

            $p.delay(240).animate({
                'marginTop':'-1000px',
                'paddingBottom':'1000px'
            },delay,easing, function () {
                $this.animate({
                    'backgroundColor':'#fbfbfb'
                });

                var src = $img.attr('src').split('-');
                src = src[0];
                src = src+"@2x.png";

                $img.attr('src',src);
                $img.removeAttr('style');
                $h2.removeAttr('style');
                $p.removeAttr('style');
            });
        }

        $('nav ul li').hoverIntent({
            over:slideDown,
            out:slideOut
        });

    });
</script>

<div class="centered">
    <nav>
        <ul>
            <li data-color="189ad7"><a href="">
                <img src="images/about@2x.png" alt="About Kyle Jasso" data-hover="images/about-hover@2x.png" />
                <h2>About</h2>
                <p>Skills, Experience, and Education</p>
            </a></li>
            <li data-color="feeb4d"><a href="">
                <img src="images/projects@2x.png" alt="Projects" data-hover="images/projects-hover@2x.png" />
                <h2>Projects</h2>
                <p>Client and Personal Projects</p>
            </a></li>
            <li data-color="a467ef"><a href="">
                <img src="images/labs@2x.png" alt="Labs" data-hover="images/labs-hover@2x.png" />
                <h2>Labs</h2>
                <p>Just show me the code</p>
            </a></li>
            <li data-color="36ca6a"><a href="">
                <img src="images/blog@2x.png" alt="Blog" data-hover="images/blog-hover@2x.png" />
                <h2>Blog</h2>
                <p>The Ramblings of a coder</p>
            </a></li>
            <li data-color="e43737"><a href="">
                <img src="images/contact@2x.png" alt="contact" data-hover="images/contact-hover@2x.png" />
                <h2>Contact</h2>
                <p>Get in-touch with me</p>
            </a></li>
        </ul>
    </nav>
</div>

<?php include 'footer.php'; ?>