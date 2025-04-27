import axios from 'axios';
import { Product } from '../types';

const api = axios.create({
  baseURL: 'http://localhost:8000',
  headers: {
    'Content-Type': 'application/json',
  },
});

export const getProducts = async () => {
  return await api.get('/products');
};

export const getProduct = (id: number) => api.get<Product>(`/products/${id}`);
export const createProduct = async (product: Product) => {
  return await api.post('/products', product);
};
export const updateProduct = (id: number, data: Omit<Product, 'id'>) => api.put<Product>(`/products/${id}`, data);
export const deleteProduct = (id: number) => api.delete(`/products/${id}`);