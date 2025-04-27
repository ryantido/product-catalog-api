import { useEffect, useState } from 'react';
import { getProducts, deleteProduct } from '../api/productApi';
import { Product } from '../types';
import { Link } from 'react-router-dom';
import '../App.css'

export default function ProductList() {
  const [products, setProducts] = useState<Product[]>([]);
  const [message, setMessage] = useState('');

  useEffect(() => {
    getProducts()
      .then(res => {
        const data = Object.values(res.data) as Product[];
        if (data.length === 0 && res.data.message) {
          setMessage(res.data.message);
        } else {
          setProducts(data);
        }
      })
      .catch(err => {
        console.error('Erreur lors de la récupération des produits :', err);
      });
  }, []);

  const handleDelete = (id: number) => {
    deleteProduct(id).then(() => setProducts(products.filter(p => p.id !== id)));
  };

  return (
    <div className="catalog-container">
      <h1>Catalogue</h1>
      {message ? (
        <p className="catalog-message">{message}</p>
      ) : (
        <ul className="catalog-list">
          {products.map(p => (
            <li key={p.id} className="catalog-item">
              <div>
                <strong>Nom :</strong> {p.name} <br />
                <strong>Prix :</strong> {p.price.toFixed(2)} €
              </div>
              <div>
                <Link to={`/edit/${p.id}`}>Modifier</Link>
                <button onClick={() => handleDelete(p.id)}>Supprimer</button>
              </div>
            </li>
          ))}
        </ul>
      )}
    </div>
  );
}