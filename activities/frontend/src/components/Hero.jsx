import React from "react";
import "./Hero.css";
import Button from "./Button";

const Hero = ({ title, description, buttonText }) => {
  return (
    <section className="hero-container">
      <div className="hero-content">
        <h1>{title}</h1>
        <p>{description}</p>
        <Button varient="primary" type="button">
          {buttonText}
        </Button>
      </div>
    </section>
  );
};

export default Hero;
