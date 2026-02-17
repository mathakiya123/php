<?php
require_once('header.php');
?>            <div class="col-md-9 p-5">
                <div class="row w-50">
                    <h2>Enter Manual Attandence</h2>

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
                            <label for="Select Attandence" class="form-label"> Select Attandence:</label>
                            <select class="form-select" >
                                <option value="" disabled> Select Attandence</option>
                                <option value="">Present</option>
                                <option value="">Absent</option>
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