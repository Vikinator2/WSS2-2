import React from "react";
import Header from "../components/Header";
import Hero from "../components/Hero";
import MainContent from "../components/MainContent";
import Footer from "../components/Footer";

const Landing = () => {
  return (
    <>
      <Header />
      <Hero
        title="Welcome to My App"
        description="Your one-stop solution for managing your inventory"
        buttonText="Get Started"
      />
      <MainContent />
      <Footer />
    </>
  );
};

export default Landing;
