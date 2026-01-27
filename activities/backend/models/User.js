import mongoose from "mongoose";
import bcrypt from "bcryptjs";

const userSchema = new mongoose.Schema(
  {
    username: { type: String, required: true, unique: true },
    email: { type: String, required: true, unique: true },
    password: { type: String, required: true },
    role: {
      type: String,
      enum: ["User", "Moderator", "Admin"],
      default: "User",
    },
  },
  { timestamps: true }
);

//Middleware - Intercepts the Actual Thing, Before Mongoose Does its Action/Actual Thing (PRE-PROCESS)
userSchema.pre("save", async function (next) {
  //short circuiting
  if (!this.isModified("password")) return next();
  this.password = await bcrypt.hash(this.password, 10); //salt - number of times the jumble-tron works in hashing a password
});

export default mongoose.model("User", userSchema);
