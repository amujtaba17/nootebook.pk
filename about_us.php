<?php
include ("require/header.php");
?>

<?php
include ("require/navbar.php");
?>

<!-- Index Hero Header -->


<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="Assets/heroimage3.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 text-body-emphasis lh-1 mb-3 fw-bold">ABOUT US</h1>
            <p class="lead">Notebook.pk is your go-to platform for exploring your passions and fueling your curiosity.
                We offer insightful articles, engaging discussions, and valuable resources on a wide range of topics,
                from sports and education to music and beyond.
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            </div>
        </div>
    </div>
</div>
<!-- Index hero Header -->



<!-- --------------------------------------Section Blogs-------------------------------- -->

<div class="container sectin3 my-2">

    <!-- S3-Row Blogs Heading -->

    <div class="row categoryHead">
        <div class="col-sm-12 text-center">
            <h2 class="display-4 fs-2">Meet our Experts &#128101	</h2>
        </div>
    </div>
    <!-- S3-Row Category Heading -->







    <!-- S3-Row Category Cards -->
    <div class="row cards my-5 text-center gy-2">
        <?php for($i=1;$i<=3;$i++){
         ?>

        <div class="col-sm-4">
            <div class="card">
                <img src="Assets/about_persons.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ahmed Mujtaba Jawad</h5>
                    <p class="card-text">Admin/Front-End Developer</p>
                    <a href="#" class="btn btn-primary">View Portfolio</a>
                </div>
            </div>
        </div>


        <?php
       }
       ?>
    </div>
    <!-- S3-Row blog Cards -->

</div>

<!-- Section - 3 BLogs -->


<!-- Index Hero Header -->


<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="Assets/motivation.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 text-body-emphasis lh-1 mb-3">Our Motivation &#9889</h1>
            <p class="lead">Notebook.pk isn't a solitary endeavor. It's a vibrant community of fellow creators, each
                with unique perspectives and experiences. You can connect with like-minded individuals, share feedback,
                and find inspiration from their journeys.
                Notebook.pk isn't just about the destination; it's about the journey itself. It's about taking that
                first step, overcoming self-doubt, and nurturing your creative spark. So, whether you're a seasoned
                writer, a budding artist, or simply someone with a story to tell, Notebook.pk is your invitation to
                unleash your voice, embrace your passions, and join the creative adventure!
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            </div>
        </div>
    </div>
</div>
<!-- Index hero Header -->

<div class="container sectin3 my-2">

    <!-- S3-Row Blogs Heading -->

    <div class="row categoryHead">
        <div class="col-sm-12 text-center">
            <h2 class="display-4 fs-1 ">Conclusion & Dedication &#10084;</h2>
        </div>
    </div>
    <!-- S3-Row Category Heading -->


    <div class="row categoryHead">
        <div class="col-sm-12 text-center">
            <p class="text-center fs-6 fw-normal">As you reach the end of this notebook, we hope you've unearthed a treasure trove of
                knowledge and discovered new perspectives on a range of topics. Notebook.pk strives to be your one-stop
                shop for information, offering a smorgasbord of blogs written by passionate individuals and experts
                alike. Whether you're seeking to quench your curiosity on a particular subject, broaden your horizons,
                or simply enjoy a well-crafted piece of writing, Notebook.pk is here to cater to your intellectual
                appetite. Remember, the journey of learning never truly ends, and Notebook.pk is here to be your
                companion on that exciting path. We encourage you to revisit our pages often, delve deeper into subjects
                that pique your interest, and share your newfound knowledge with others.

                Dedication
                This notebook is dedicated to our readers, the curious minds who fuel our passion for creating
                informative and engaging content. Your thirst for knowledge is what keeps us striving to deliver the
                best possible experience. We appreciate your time, your thoughtful comments, and your willingness to
                embark on this exploration of ideas with us. Notebook.pk is a platform built by and for a community of
                learners, and we are grateful to be part of this vibrant exchange of information. Let's continue to
                explore, to grow, and to share the power of knowledge together.








            </p>
        </div>
    </div>
    <!-- S3-Row Category Heading -->



</div>






<?php
include ("require/footer.php");
?>