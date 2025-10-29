        <?php
        require_once('header.php');
        ?>
            <div class="col-md-9 p-5">
                
                <div class="row w-50">
                    <h2>Change Your Shify Here</h2>

                    <form action="">
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="email" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="Select Shift" class="form-label"> Select Shift:</label>
                            <select class="form-select" >
                                <option value="" disabled> Select Shift</option>
                                <option value="">Moring 9:00am T0 5:30pm</option>
                                <option value="">Moring 7:30am T0 4:00pm</option>
                                <option value="">Moring 8:30am T0 5:00pm</option>
                                <option value="">Moring 10:00am T0 6:30pm</option>
                                <option value="">Moring 11:00am T0 7:00pm</option>
                            </select>                    
                        </div>

                        <div class="form-group mb-3">
                            <button class="btn btn-success w-100">Add Attandence</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->

   
</body>

</html>