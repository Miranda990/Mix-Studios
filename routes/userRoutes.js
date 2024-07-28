const express = require('express');
const router = express.Router();
const { register, login, authMiddleware, adminMiddleware } = require('../controllers/userController');

// Registrar Usuário
router.post('/register', register);

// Login Usuário
router.post('/login', login);

// Rota de Teste de Admin
router.get('/admin', authMiddleware, adminMiddleware, (req, res) => {
    res.send('Bem-vindo, Admin!');
});

module.exports = router;
