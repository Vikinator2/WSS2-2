import "./MainContent.css";
import React from "react";
import { useEffect } from "react";

const MainContent = () => {
  const features = [
    { id: 1, Name: "Item 1", description: "Description of Item 1" },
    { id: 2, Name: "Item 2", description: "Description of Item 2" },
    { id: 3, Name: "Item 3", description: "Description of Item 3" },
  ];
  useEffect(() => {
    console.log(features);
  }, []);

  return (
    <main className="content-wrapper">
      <section className="intro-section">
        <h2>Introduction</h2>
        <p>Lorem Ipsum</p>
      </section>
      <div className="feature-grid">
        {features.map((feature) => (
          <div key={feature.id} className="feature-card">
            <h3>{feature.title}</h3>
            <p>{feature.description}</p>
          </div>
        ))}
      </div>
    </main>
  );
};

export default MainContent;
