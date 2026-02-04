import Login from "./pages/Login.jsx";
import './App.css'
import { AuthProvider } from "./contexts/AuthContext";

function App() {

  return (
    <AuthProvider>
       <Login> </Login>
    </AuthProvider>
  );
}

export default App
