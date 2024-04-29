
CREATE TABLE public.cliente (
    id integer NOT NULL,
    nome character varying(100),
    cpf character varying(11) NOT NULL,
    telefone character varying(11),
    usuario_id integer NOT NULL
);


CREATE TABLE public.pedido (
    id integer NOT NULL,
    data_pedido date,
    status_pedido character varying(20),
    total_pedido numeric(10,2),
    cliente_id integer,
    endereco_entrega character varying(100),
    metodo_pagamento character varying(50),
    data_entrega_esperada date,
    usuario_id integer NOT NULL
);

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    email character varying(100),
    senha_hash character varying(61),
    foto character varying(1024),
    nome character varying(255),
    data_nascimento date
);


