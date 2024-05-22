import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import Home from "./pages/Home";
import Game from "./pages/Game";
import Game2 from "./pages/Game2";
import Final from "./pages/Final";

function App() {
  return (
    <BrowserRouter>
      <div className="container mx-auto">
        <Routes>
          <Route path="/" element={<Navigate to="/home" />}></Route>
          <Route path="/home" element={<Home />}></Route>
          <Route path="/game" element={<Game />}></Route>
          <Route path="/game2" element={<Game2 />}></Route>
          <Route path="/final" element={<Final />}></Route>
        </Routes>
      </div>
    </BrowserRouter>
  );
}

export default App;
