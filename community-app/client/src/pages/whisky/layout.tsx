export default function Layout({children}: {children: React.ReactNode}) {
  return (
    <form action="">
      <h2 className="text-4xl">Whisky</h2>
      {children}
    </form>
  );
}
