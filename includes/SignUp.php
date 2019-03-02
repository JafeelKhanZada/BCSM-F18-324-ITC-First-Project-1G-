<div class="container-fluid MainSignUp">
    <div class="row">
        <div class="col-md-4 SignUpLeft">
            <div class="InnerContent d-flex justify-content-center align-items-center flex-column flex-wrap">
                <h1>carrino</h1>
                <ul class="Features">
                    <li><i class="fa fa-search"></i><span>Explore your favourite topics.</span></li>
                    <li><i class="fa fa-comments-o"></i><span>Create your own post and publish it.</span></li>
                    <li><i class="fa fa-thumbs-up"></i><span>Like, comments, and share the posts.</span></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 SignUpRight">
            <div class="InnerContent d-flex justify-content-center align-items-center flex-column flex-wrap">
                <h1>Create a new account.</h1>
                <form autoComplete="off" class="container">
                    <label for="Email">Email</label>
                    <br />
                    <input id="Email" required autoComplete="off" type="email" placeholder="Enter Your Email...." />
                    <label for="Password">Password</label>
                    <br />
                    <input id="Password" required autoComplete="off" type="password" placeholder="Enter Your Password...." />
                    <label for="ConfrimPassword">Confrim Password</label>
                    <br />
                    <input id="ConfrimPassword" required autoComplete="off" type="password" placeholder="Enter Your Password Again...." />
                    <input class="TNC" type="checkbox" /><span>I agree with <span>Terms&Conditions</span></span>
                    <br />
                    <!-- <div class='PassError'>Error: <span>{this.state.ConfirmPassError}</span></div> -->
                    <button type="submit">Sign Up</button>
                    <span><a href='Login.php' >Sign In</a></span>
                </form>
            </div>
        </div>
    </div>
</div>
