<?php $page = "index"; ?>
<?php include 'header.php'; ?>
<script type="text/javascript">
    $(function () {
        var MAX_MODULE = 0;
        $('nav').find('li').each(function () {
            if($(this).height() > MAX_MODULE) {
                MAX_MODULE = $(this).height();
            }
        });

        $('nav').find('li').css('height',MAX_MODULE+"px");

        $('#sti-menu').iconmenu();
    });
</script>

<div class="centered">
    <nav>
        <ul id="sti-menu" class="sti-menu">
            <li data-hovercolor="#37c5e9">
                <a href="#">
                    <h2 data-type="mText" class="sti-item">About</h2>
                    <p data-type="sText" class="sti-item">Skills, Education, and Experience</p>
                    <span data-type="icon" class="sti-icon sti-icon-care sti-item"></span>
                </a>
            </li>
            <li data-hovercolor="#ff395e">
                <a href="#">
                    <h2 data-type="mText" class="sti-item">Projects</h2>
                    <p data-type="sText" class="sti-item">Client, and personal Work</p>
                    <span data-type="icon" class="sti-icon sti-icon-alternative sti-item"></span>
                </a>
            </li>
            <li data-hovercolor="#57e676">
                <a href="#">
                    <h2 data-type="mText" class="sti-item">Labs</h2>
                    <p data-type="sText" class="sti-item">Just show me the code</p>
                    <span data-type="icon" class="sti-icon sti-icon-info sti-item"></span>
                </a>
            </li>
            <li data-hovercolor="#d869b2">
                <a href="#">
                    <h2 data-type="mText" class="sti-item">Blog</h2>
                    <p data-type="sText" class="sti-item">Ramblings of a coder</p>
                    <span data-type="icon" class="sti-icon sti-icon-family sti-item"></span>
                </a>
            </li>
            <li data-hovercolor="#ffdd3f">
                <a href="#">
                    <h2 data-type="mText" class="sti-item">Contact</h2>
                    <p data-type="sText" class="sti-item">Get in-touch with me</p>
                    <span data-type="icon" class="sti-icon sti-icon-technology sti-item"></span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<?php include 'footer.php'; ?>