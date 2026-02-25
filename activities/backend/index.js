import express from "express";
import dotenv from "dotenv";
import cors from "cors";
import connectDB from "./config/db.js"; 
import authRoutes from "./routes/authRoutes.js";
import inventoryRoutes from "./routes/authRoutes.js";

const app = express();
const PORT = 3000;
dotenv.config();

app.use(express.json());
app.use(cors({
    origin: "*",
    methods: ["GET, POST"],
}),
);
app.use("/api/auth", authRoutes);
app.use("/api/inventory", InventoryRoutes);

app.listen(PORT, () => {
    connectDB();
    console.log(`Server is running on PORT: ${PORT}`);
});