import { useState, useEffect } from "react";
import Card from "../components/Card";
import Button from "../components/Button";
import Input from "../components/Input";
import TextArea from "../components/TextArea";
import "./Login.css";
import slugify from "slugify";
import { useAuth } from "../context/AuthContext";
import { useNavigate } from "react-router-dom";

const Inventory = () => {
  const [errors, setErrors] = useState({});
  const [loading, setLoading] = useState(false);
  const [slug, setSlug] = useState("");
  const [formData, setFormData] = useState({
    name: "",
    slug: "",
    description: "",
    price: 0,
  });
  const navigate = useNavigate();

  const { user } = useAuth();

  // const { login } = useAuth();

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await login(formData);
      alert("Product added");
    } catch (error) {
      setErrors({ error: error.message });
    }
  };

  useEffect(() => {
    const generatedSlug = slugify(formData.name, {
      lower: true,
      strict: true,
    });
    setSlug(generatedSlug);
  }, [formData]);

  useEffect(() => {
    if (!user) {
      // Redirect to login
      navigate("/login");
    }
  }, []); // empty array to mount

  return (
    <Card title="Create product">
      <form className="login-form" onSubmit={handleSubmit}>
        <Input
          label="Name"
          type="text"
          name="name"
          value={formData.name}
          onChange={handleChange}
          error={errors.name}
          placeholder="Product name"
          required
        />
        <Input
          label="Slug"
          type="text"
          name="slug"
          value={slug}
          onChange={handleChange}
          error={errors.slug}
        />
        <TextArea
          label="Description"
          name="description"
          error={errors.Description}
          rows={10}
          cols={40}
        ></TextArea>
        <Input
          label="Price"
          name="price"
          type="number"
          value={formData.price}
          error={errors.price}
          onChange={handleChange}
        />
        <Button type="submit" loading={loading}>
          Save product
        </Button>
      </form>
    </Card>
  );
};

export default Inventory;
