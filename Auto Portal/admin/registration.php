            <?php
            require_once('header.php');
            ?>

            <div class="col-md-9 p-5">
                <div class="row w-50">
                    <h2>Registation Form</h2>

                    <form action="">
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="email">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="phone_number" class="form-label">Phone Number:</label>
                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="pincode" class="form-label">Pincode:</label>
                            <input type="text" class="form-control" placeholder="Enter Pincode" name="pincode">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="address" class="form-label">Address:</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <button class="btn btn-success w-100">Add Registration</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- footer -->

   
</body>

</html>