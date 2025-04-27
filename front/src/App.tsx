import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import ProductList from './pages/ProductList';
import ProductForm from './pages/ProductForm';

export default function App() {
  return (
    <Router>
      <nav>
        <Link to="/">Liste</Link> | <Link to="/create">Créer</Link>
      </nav>
      <Routes>
        <Route path="/" element={<ProductList />} />
        <Route path="/create" element={<ProductForm />} />
        <Route path="/edit/:id" element={<ProductForm />} />
      </Routes>
    </Router>
  );
}