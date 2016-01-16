#Interface Iterator

No PHP, Iterator é uma interface especial que provê uma forma de você iterar um objeto de maneira simples.
Ou seja, ela determina como é que seu objeto se comporta quando for iterado.
Um grande exemplo disso é quando utilizamos o `foreach`

Para usá-la você deve implementar todos os métodos que a mesma "obriga" a classe ter. São 5 métodos.

Esses métodos são:

- `Iterator::key()` retorna a key atual da iteração.

- `Iterator::valid()` informa se a iteração pode continuar ou não. Deve retornar um booleano.

- `Iterator::rewind()` voltar a iteração ao ponto inicial.

- `Iterator::current()` retorna o valor atual da iteração.

- `Iterator::next()` responsável pela operação que manda a iteração para o próximo ponto.



Por exemplo, podemos de forma simples definir a seguinte classe:

```php
class Range implements Iterator
{
	public function __construct($min, $max)
	{
		$this->min = $min;
		$this->max = $max;
		$this->current = $this->min;
		$this->key = 0;
	}

	public function next()
	{
		++$this->min;
        ++$this->key;
	}

	public function key()
	{
		return $this->key;
	}

	public function current()
	{
		return $this->current;
	}

	public function rewind()
	{
		$this->key = 0;
		$this->current = $this->min;
	}

	public function valid()
	{
		return $this->current >= $this->max;
	}
}
```


Podemos usá-la da seguinte forma:

```php
foreach (new Range(1, 10) as $key => $value)
{
	echo "$key=>$value";
}
```


A saída será algo parecido com isso:
```php
0=>1,
1=>2,
2=>3
```

Observem que o comportamente dessa classe, em relação ao `foreach`, foi modificado. Para testar, basta remover a implementação de `Iterator` e deixar os métodos da mesma forma, e você vai ver que nada vai ser executado. Isso porque a interface `Iterator` é uma interface especial, que o php processa internamente para poder fazer tal operação com as classes.

A chama de um Iterator com um foreach pode ser comparada com a seguinte estrutura:

```php
$range = new Range(1, 10);

for ($range->rewind(); $range->valid(); $range->next())
{
	$key = $range->key();
	$value = $range->current();
}
```