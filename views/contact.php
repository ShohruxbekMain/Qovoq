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
    <h1 class="mb-3"><?= htmlspecialchars($title ?? 'Contact us') ?></h1>
    <p>This is the contact page.</p>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputSubject1" class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" id="exampleInputSubject1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleTextareaBody1" class="form-label">Body</label>
            <textarea name="body" class="form-control" id="exampleTextareaBody1" rows="4" maxlength="5000"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>