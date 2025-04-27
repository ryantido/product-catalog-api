import { useState, useEffect } from 'react';
import { useNavigate, useParams } from 'react-router-dom';

import { Product } from '../types';
import { createProduct, getProduct, updateProduct } from '../api/productApi';


export default function ProductForm() {
  const { id } = useParams();
  const navigate = useNavigate();
  const isEdit = Boolean(id);
  const [product, setProduct] = useState<Omit<Product, 'id'>>({ name: '', price: 0 });

  useEffect(() => {
    if (isEdit) getProduct(+id!).then(res => setProduct({ name: res.data.name, price: res.data.price }));
  }, [id, isEdit]);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (isEdit) {
      updateProduct(+id!, product).then(() => {
        navigate('/');
        window.location.reload();
      });
    } else {
      const newProduct: Product = { id: Date.now(), ...product };
      createProduct(newProduct).then(() => {
        navigate('/');
        window.location.reload();
      });
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <div>
        <label>Nom: <input value={product.name} onChange={e => setProduct({ ...product, name: e.target.value })} required /></label>
      </div>
      <div>
        <label>Prix: <input type="number" step="0.01" value={product.price} onChange={e => setProduct({ ...product, price: +e.target.value })} required /></label>
      </div>
      <button type="submit">{isEdit ? 'Mettre à jour' : 'Créer'}</button>
    </form>
  );
}