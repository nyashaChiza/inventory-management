<!-- <?php

namespace App\Cache;
use PhpAmqpLib\Connection\AMQPStreamConnection; // Import the AMQPStreamConnection class
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Contracts\Cache\Store;
use PhpAmqpLib\Message\AMQPMessage;
use Illuminate\Support\Facades\Log;

class RabbitMQStore 
{
    use RetrievesMultipleKeys;

    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function get($key)
    {
        Log::info("Cache request fetching from RabbitMQ" );

        // Connect to RabbitMQ
        // $connection = new AMQPStreamConnection(
        //     $this->connection['host'],
        //     $this->connection['port'],
        //     $this->connection['user'],
        //     $this->connection['password']
        // );

        $channel = $this->connection->channel();

        // Declare the queue
        $channel->queue_declare($key, false, false, false, false);

        // Get the message from the queue
        $message = $channel->basic_get($key);

        Log::info("Cache request fetching from RabbitMQ" );

        // Close the channel and connection
        $channel->close();
        $this->connection->close();

        // Return the cached value if message exists, otherwise return null
        return $message ? unserialize($message->body) : null;
}

public function put($key, $value, $seconds)
{
    // Connect to RabbitMQ
    // $connection = new AMQPStreamConnection(
    //     $this->connection['RABBITMQ_HOST'],
    //     $this->connection['RABBITMQ_PORT'],
    //     $this->connection['RABBITMQ_USER'],
    //     $this->connection['RABBITMQ_PASSWORD']
    // );

    $channel = $this->connection->channel();

    // Declare the queue
    $channel->queue_declare($key, false, false, false, false);

    // Serialize the value before storing it
    $serializedValue = serialize($value);

    // Publish the value to the queue
    $channel->basic_publish(new AMQPMessage($serializedValue), '', $key);
     // Serialize the key and value into cache request data
     $data = [
        'key' => $key,
        'value' => $value,
    ];
    $messageBody = json_encode($data);

    // Create and publish the cache request message
    $message = new AMQPMessage($messageBody);
    $channel->basic_publish($message, '', 'cache_requests');
    // Log the cache request
    Log::info("Cache request published to RabbitMQ: Key=$key, Value=$value");


    // Close the channel and connection
    $channel->close();
    $this->connection->close();
}
public function increment($key, $value = 1)
{
    // Implementation for increment method
}

public function decrement($key, $value = 1)
{
    // Implementation for decrement method
}

public function forever($key, $value)
{
    // Implementation for forever method
}

public function forget($key)
{
    // Implementation for forget method
}

public function flush()
{
    // Implementation for flush method
}

public function getPrefix()
{
    // Implementation for getPrefix method
}
public function has()
{
    // Implementation for getPrefix method
    return True;
}
} -->
