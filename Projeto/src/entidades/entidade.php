<?php

abstract class Entidade
{
    abstract protected function definirTabela(): string;

    abstract protected function definirChavePrimaria(): string;

    abstract protected function dadosParaPersistencia(): array;

    final public function nomeTabela(): string
    {
        return $this->definirTabela();
    }

    final public function chavePrimaria(): string
    {
        return $this->definirChavePrimaria();
    }

    final public function dados(): array
    {
        return $this->dadosParaPersistencia();
    }

    /**
     * @return Entidade[]
     */
    public function tabelasAssociadas(): array
    {
        return [];
    }
}
