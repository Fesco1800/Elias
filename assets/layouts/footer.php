
<?php if (isset($_SESSION['auth'])) { ?>

</body>

    <footer id="myFooter" >
        <div class="container">
            <div class="row">
                
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="../home/index.php" >Home</a></li>
                        
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Features</h5>
                    <ul>
                        
                        <li><a href="../client/aliasing.php" >Generate an Alias</a></li>
                        <li><a href="../profile" >Profile</a></li>
                        <li><a href="../profile-edit" >Edit Profile</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="../contact/" >Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 my-3">
                    <div class="social-networks">
                        <a href="https://github.com/Fesco1800" class="twitter" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.facebook.com" class="facebook" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                    <a class="btn btn-default" href="mailto:frte1775@gmail.com" target="_blank" style="background: #6f42c1;">Email Me</a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>
                <a href="#" target="_blank">@</a> 
                <a href="#" target="_blank">Elias</a>    
                <a href="#" target="_blank">2023</a>
            </p>
        </div>
    </footer>

<?php } ?>


<!-- <script src="../assets/vendor/js/jquery-3.4.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<!-- <script src="../assets/vendor/js/popper.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script src="../assets/vendor/bootstrap-4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script src="../assets/js/app.js"></script>
<script src="../client/js/management.js"></script>
<script src="../client/js/aliasing.js"></script>
<script src="../client/js/logins.js"></script>

<?php if(isset($_SESSION['auth'])) { ?> 

<script src="../assets/js/check_inactive.js"></script>
    
<?php } ?>

</div>
</body>

</html>

<?php

if (isset($_SESSION['ERRORS']))
    $_SESSION['ERRORS'] = NULL;
if (isset($_SESSION['STATUS']))
    $_SESSION['STATUS'] = NULL;

?>

<?php ob_end_flush(); ?>