import User from "../models/User.js";
import jwt from "jsonwebtoken";
import bcrypt from "bcryptjs";

// Response codes
// 100 - handshakes
// 200 - success
// 400 - bad request
// 401 - unauthorized
// 403 - forbidden
// 404 - not found
// 500 - internal server error

export const register = async (req, res) => {
  try {
    const { username, email, password } = req.body;
    const userExists = await User.findOne({ email });

    if (userExists)
      return res.status(400).json({ message: "User already exists." });

    const user = await User.create({ username, email, password });
    res.status(201).json({ message: "User registered successfully." });
  } catch (e) {
    res
      .status(500)
      .json({ message: "Internal Server Error" + e.message, error: e.message });
  }
};

export const login = async (req, res) => {
  try {
    const { username, password } = req.body;
    const user = await User.findOne({ username });
    const passwordsMatch = await bcrypt.compare(password, user.password);

    // If user isn't null and passwords match
    if (user && passwordsMatch) {
      const token = jwt.sign(
        {
          id: user._id,
          role: user.role,
          name: user.username,
        },
        process.env.JWT_SECRET,
        { expiresIn: "1d" },
      );
    }
  } catch (e) {
    res.status(500).json({ message: e.message });
  }
};

export const logout = (req, res) => {
  try {
    res.clearCookie("token");
    res.status(200).json({ message: "User logged out successfully." });
  } catch (e) {
    res.status(500).json({ message: e.message });
  }
};
