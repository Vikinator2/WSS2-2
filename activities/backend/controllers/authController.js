import User from "../models/User.js";
import jwt from "jsonwebtoken";
import bcrypt from "bcryptjs";

export const register = async (req, res) => {
  try {
    const { username, email, password } = req.body;
    const userExists = await User.findOne({ email });
    if (userExists)
      return res.status(400).json({ message: "Alpha User still alive" }); //400series  client error401 authorization, 403 forbidden, 404 resource not found

    const user = await User.create({ username, email, password });
    res.status(201).json({ message: "Alpha User registered successfully" }); //201 - Successfullyy Created
  } catch (error) {
    res.status(500).json({ message: error.message }); //500 - Internal Server Error
  }
};

export const login = async (req, res) => {
  try {
    const { email, password } = req.body;
    const user = await User.findOne({ email });
    const passwordMatched = await bcrypt.compare(password, user.password);

    if (user && passwordMatched) {
      const token = jwt.sign(
        {
          id: user._id,
          role: user.role,
          name: user.username,
        },
        process.env.JWT_SECRET,
        { expireIn: "1d" }
      );
      res.status(200).json({ _id: user._id, username: user.username, token });
    }
  } catch {
    res.status(500).json({ message: error.message });
  }
};

export const logout = (req, res) => {
  res.status(200).json({ message: "Alpha user has been logged out" });
};
