const User = require('../models/User');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');

// Registrar Usuário
exports.register = async (req, res) => {
    const { name, email, password, role } = req.body;
    try {
        let user = await User.findOne({ email });
        if (user) return res.status(400).json({ msg: 'Usuário já registrado' });

        user = new User({ name, email, password, role });
        const salt = await bcrypt.genSalt(10);
        user.password = await bcrypt.hash(password, salt);
        await user.save();

        const payload = { user: { id: user.id, role: user.role } };
        jwt.sign(payload, 'secrettoken', { expiresIn: '1h' }, (err, token) => {
            if (err) throw err;
            res.json({ token });
        });
    } catch (err) {
        console.error(err.message);
        res.status(500).send('Server error');
    }
};

// Login Usuário
exports.login = async (req, res) => {
    const { email, password } = req.body;
    try {
        let user = await User.findOne({ email });
        if (!user) return res.status(400).json({ msg: 'Credenciais inválidas' });

        const isMatch = await bcrypt.compare(password, user.password);
        if (!isMatch) return res.status(400).json({ msg: 'Credenciais inválidas' });

        const payload = { user: { id: user.id, role: user.role } };
        jwt.sign(payload, 'secrettoken', { expiresIn: '1h' }, (err, token) => {
            if (err) throw err;
            res.json({ token });
        });
    } catch (err) {
        console.error(err.message);
        res.status(500).send('Server error');
    }
};

// Middleware para verificar token e permissões
exports.authMiddleware = (req, res, next) => {
    const token = req.header('x-auth-token');
    if (!token) return res.status(401).json({ msg: 'Nenhum token, autorização negada' });

    try {
        const decoded = jwt.verify(token, 'secrettoken');
        req.user = decoded.user;
        next();
    } catch (err) {
        res.status(401).json({ msg: 'Token inválido' });
    }
};

// Middleware para verificar se o usuário é admin
exports.adminMiddleware = (req, res, next) => {
    if (req.user.role !== 'admin') return res.status(403).json({ msg: 'Acesso negado' });
    next();
};
