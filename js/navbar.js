const createNav = () => {
    let nav = document.querySelector('#sidebar');

    nav.innerHTML = `<ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="shop.php">Shop Now</a></li>
    <li>
        <a class="feat-btn">Products
            <span class="fas fa-caret-down first"></span>
        </a>
        <ul class="feat-show">
            <li><a href="#">Item 1</a></li>
            <li><a href="#">Item 2</a></li>
            <li>
                <a class="a-btn">Item 3
                    <span class="fas fa-caret-down first"></span>
                </a>
                <ul class="a-show">
                    <li><a href="#">Item 1</a></li>
                    <li><a href="#">Item 2</a></li>
                    <li>
                        <a class="a1-btn">Item 3
                            <span class="fas fa-caret-down first"></span>
                        </a>
                        <ul class="a1-show">
                            <li><a href="#">Item 1</a></li>
                            <li><a href="#">Item 2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="about.html">About</a></li>
    <li><a href="404.html">Team</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li>
        <a class="serv-btn">Account
            <span class="fas fa-caret-down second"></span>
        </a>
        <ul class="serv-show">
            <li><a href="login/login.php">Login</a></li>
            <li><a href="register/register.html">Sign Up</a></li>
        </ul>
    </li>
   
    
</ul>
    `;
}

createNav();