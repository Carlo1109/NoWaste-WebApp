PGDMP         6                {           DatabaseUtenti    15.2    15.2     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    19193    DatabaseUtenti    DATABASE     �   CREATE DATABASE "DatabaseUtenti" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Italian_Italy.1252';
     DROP DATABASE "DatabaseUtenti";
                postgres    false            �            1259    19214    utente    TABLE       CREATE TABLE public.utente (
    email character varying(40) NOT NULL,
    pswd character varying(40),
    telefono character varying(40),
    nomeass character varying(40),
    nomep character varying(40),
    cognomep character varying(40),
    idaz character varying(40)
);
    DROP TABLE public.utente;
       public         heap    postgres    false            �          0    19214    utente 
   TABLE DATA           W   COPY public.utente (email, pswd, telefono, nomeass, nomep, cognomep, idaz) FROM stdin;
    public          postgres    false    214          e           2606    19218    utente utente_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.utente
    ADD CONSTRAINT utente_pkey PRIMARY KEY (email);
 <   ALTER TABLE ONLY public.utente DROP CONSTRAINT utente_pkey;
       public            postgres    false    214            �   �   x�u��
�0Eד�p/���St)~��i2�@�)�/�zS
�f6�p�EOK�jPʍ�v=:��a�i��ha��u��"����4a�#ÁV��F�a����N���s4��yQVu���(XQ�O��@i�5I�CSW�VK�: 1+-e+�`�DO`8|żki��]�NY�y�(���~�s&�xJ�\w     