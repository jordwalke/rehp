<?hh // strict

function FBLogger(string $namespace, string $message): void {
  echo $namespace . ": " . $message . "\n";
}
