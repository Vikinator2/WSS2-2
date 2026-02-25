import React from "react"
import "./footer.css";

const Footer = () => {    
    return (
        <footer className='footer-container'>
        <div className='footer-content'>
            <div className='footer-brand'>
                <h3>My App</h3>
            <p>One Stop Shop for all your needs!</p>
    </div>
    </div>
    <div className="footer-links">
        <a href="/">Home<a/>
        <a href="/login">Login</a>
        <a href="/Inventory">Inventory</a>
    </div>
    <div className="footer-bottom">
        <p>&copy; 2026 My App. All rights reserved.</p>
    </div>
    </footer>
    );
};

export default Footer