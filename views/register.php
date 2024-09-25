<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       24.09.2024
 * Time:       21:43
 */
?>
<div class="container mt-5 ">
    <h1 class="mb-3">Create an account</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputRegFirstName" class="form-label">First name</label>
                    <input type="text" name="firstname" class="form-control" id="exampleInputRegFirstName">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputRegLastName" class="form-label">Last name</label>
                    <input type="text" name="lastname" class="form-control" id="exampleInputRegLastName">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputRegEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputRegEmail"
                   aria-describedby="emailRegHelp">
            <div id="emailRegHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputRegPassword" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputRegPassword">
        </div>
        <div class="mb-3">
            <label for="exampleInputRegPasswordRepeat" class="form-label">Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control" id="exampleInputRegPasswordRepeat">
        </div>
        <div class="d-flex align-items-center justify-content-start mb-4">
            <a href="/login">I have already an account</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>