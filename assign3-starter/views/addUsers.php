
<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User List</h5>
                        <p class="card-text">Add a new user to the list.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="add">
                            <label for="UserID" class="form-label">UserID</label>
                            <input type="text" class="form-control mb-3" id="userID" name="userID" placeholder="Enter your UserID" required>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Enter your Username" required>
                            <label for="lastname" class="form-label">Lastname</label>
                            <input type="text" class="form-control mb-3" id="lastname" name="lastname" placeholder="Enter your Lastname" required>
                            <label for="firstname" class="form-label">Firstname</label>
                            <input type="text" class="form-control mb-3" id="firstname" name="firstname" placeholder="Enter your Firstname" required>
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control mb-3" id="password" name="password" placeholder="Enter your Password" required>
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control mb-3" id="email" name="email" placeholder="Enter your Email Address" required>
                            <label for="role"class="form-label">Role</label>
                            <input type="text" class="form-control mb-3" id="role" name="role" placeholder="Enter your Role" required>
                            <label for="lastModified" class="form-label">Last Modified</label>
                            <input type="text" class="form-control mb-3" id="lastModified" name="lastModified" placeholder="Time Last Modified" required>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>