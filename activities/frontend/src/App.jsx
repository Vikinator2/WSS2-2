import Login from "./pages/Login";
import Inventory from "./pages/Inventory";
import Landing from "./pages/Landing";
import "./App.css";
import { AuthProvider } from "./contexts/AuthContext";
import { BrowserRouter, Routes, Route } from "react-router-dom";

function App() {
  return (
    <BrowserRouter>
      <AuthProvider>
        <Routes>
          <Routes path="/" element={<Landing />} />
          <Routes path="/login" element={<login />} />
          <Routes path="/inventory" element={<Inventory />} />
        </Routes>
      </AuthProvider>
    </BrowserRouter>
  );
}

export default App;
